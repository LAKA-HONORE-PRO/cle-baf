import { useState } from "react";
import { BsEye, BsEyeSlash } from "react-icons/bs";
import { Link } from "react-router-dom";

export default function Login() {

    const [showPassword, setShowPassword] = useState(false);


    return (
        <div className="flex flex-col w-full h-auto justify-center items-center px-6 md:px-80 p gap-y-3 py-32 animate__animated animate__fadeIn">

            <Link to={'/'} className="flex flex-col w-full justify-center items-start px-6 md:px-40">
                <img src="/assets/img/logo.png" className="w-32" alt="Logo" />
            </Link>
            <div className="flex flex-col w-full justify-center items-start px-6 md:px-40">
                <h2 className="text-start text-xl font-semibold">Connexion.</h2>
                <span>Connectez-vous pour profiter de nos services.</span>
            </div>


            <form autoComplete="off" className="flex flex-col w-full justify-center items-start px-6 md:px-40 my-6 gap-y-6">
                <div className="flex flex-col w-full">
                    <input type="text" className="border-[1px] border-gray-900 hover:border-[2px] focus:border-purple-700 transition-all px-4 py-2 rounded-md placeholder:text-black focus:placeholder:text-purple-700 w-full outline-none"
                        name="email" id="email" placeholder="E-mail ou numéro de téléphone" required
                    />
                </div>

                <div className="flex flex-col w-full justify-center items-center">
                    <input type={`${showPassword ? 'text' : 'password'}`} className="border-[1px] border-gray-900 hover:border-[2px] focus:border-purple-700 transition-all px-4 py-2 rounded-md placeholder:text-black focus:placeholder:text-purple-700 w-full outline-none"
                        name="password" id="password" placeholder="Mot de passe" required
                    />
                    <div className="absolute right-[15%] md:right-[30%] cursor-pointer" onClick={()=>setShowPassword(!showPassword)}>
                        {
                            showPassword ? (
                                <BsEyeSlash />
                            ):(
                                <BsEye />
                            )
                        }
                    </div>
                </div>

                <button type="submit" className="bg-purple-700 w-full py-2 px-3 text-white text-center rounded-md hover:bg-purple-800 transition font-semibold cursor-pointer">
                        Se connecter
                </button>
            </form>


            <div className="flex flex-row w-full justify-center items-center gap-x-2">
                <span className="text-sm">Vous n'avez pas de compte ? </span>
                <Link to={'/register'} className="text-purple-700 font-semibold text-sm">
                    Inscrivez-vous!
                </Link>
            </div>  
        </div>
    )
}