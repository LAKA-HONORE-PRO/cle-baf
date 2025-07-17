import CryptoJS from 'crypto-js';


interface EncryptService {
    encryptData : (value: string, secretKey: string) => string,
    decryptData : (encryptData: string, secretKey: string) => string
}

export const EncryptService: EncryptService = {

    encryptData(value, secretKey) {
        const encryptData = CryptoJS.AES.encrypt(value, secretKey).toString();

        return encryptData;
    },

    decryptData(encryptData, secretKey) {
        const decryptBytes = CryptoJS.AES.decrypt(encryptData, secretKey);
        const decryptData = decryptBytes.toString(CryptoJS.enc.Utf8);

        return decryptData;
    }
}