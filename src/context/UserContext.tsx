import { createContext, useContext, useState } from "react";
import type { UserType } from "../../types/UserType";
import { EncryptService } from "../../services/EncryptServicies";



interface AuthContextType {
    user?: UserType | null;
    login: (userData: UserType) => void;
    logout: () => void;
    updateUser: (userData: UserType) => void
}

const AuthContext = createContext<AuthContextType | undefined>(undefined);

export const AuthProvider: React.FC<{ children: React.ReactNode }> = ({ children }) => {

    const [user, setUser] = useState<UserType | null>(() => {
        const encryptedUser: string | null = localStorage.getItem('user');

        if (!encryptedUser) return null;

        try {
            const storedUser = EncryptService.decryptData(encryptedUser, "test");
            const decodedUser: UserType = JSON.parse(storedUser!);
            return decodedUser ? decodedUser as UserType : null;
        } catch (error) {
            console.error("Erreur lors du déchiffrement des données utilisateur:", error);
            localStorage.removeItem('user');
            return null;
        }
    });

    const login = (userData: UserType) => {

        setUser(userData);

        const user = JSON.stringify(userData);
        const encryptData = EncryptService.encryptData(user, "test");
        localStorage.setItem('user', encryptData);
    };

    const logout = () => {
        setUser(null);
        localStorage.removeItem('user');
    };


    const updateUser = (userData: UserType) => {
        if (!user) return;

        const updatedUser = { ...user, ...userData };
        setUser(updatedUser);

        const encrypted = EncryptService.encryptData(JSON.stringify(updatedUser), "test");
        localStorage.setItem('user', encrypted);
    };


    return (
        <AuthContext.Provider value={{ user, login, logout, updateUser }}>
            {children}
        </AuthContext.Provider>
    );
};

export const useAuth = () => {
    const context = useContext(AuthContext);

    if (!context) {
        throw new Error('useAuth doit être utilisé dans un AuthProvider');
    }

    return context;
};