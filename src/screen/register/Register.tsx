import { useState } from "react";
import { BsEye, BsEyeSlash } from "react-icons/bs";
import { Link } from "react-router-dom";
import Swal from "sweetalert2";

export default function Register() {

    const [showPassword, setShowPassword] = useState(false);
    const [name, setName] = useState("");
    const [prenom, setPrenom] = useState("");
    const [phone, setPhone] = useState("");
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");
    const [confirmPassword, setConfirmPassword] = useState("");

    const handleSubmit = (e: any) => {
        e.preventDefault();

        if (name === "") {
            Swal.fire({
                title: 'Avertissement !',
                text: 'Le nom est obligatoire.',
                icon: 'warning',
                confirmButtonText: 'Compris',
                confirmButtonColor: 'oklch(49.6% 0.265 301.924)',
                timer: 1000,
                timerProgressBar: true
            })
        }

        else if (phone === "") {
            Swal.fire({
                title: 'Avertissement !',
                text: 'Le numéro de téléphone est obligatoire.',
                icon: 'warning',
                confirmButtonText: 'Compris',
                confirmButtonColor: 'oklch(49.6% 0.265 301.924)',
                timer: 1000,
                timerProgressBar: true
            })
        }

        else if (email === "") {
            Swal.fire({
                title: 'Avertissement !',
                text: 'L\'adresse email est obligatoire.',
                icon: 'warning',
                confirmButtonText: 'Compris',
                confirmButtonColor: 'oklch(49.6% 0.265 301.924)',
                timer: 1000,
                timerProgressBar: true
            })
        }

        else if (password === "") {
            Swal.fire({
                title: 'Avertissement !',
                text: 'Le mot de passe est obligatoire.',
                icon: 'warning',
                confirmButtonText: 'Compris',
                confirmButtonColor: 'oklch(49.6% 0.265 301.924)',
                timer: 1000,
                timerProgressBar: true
            })
        }

        else if (password !== confirmPassword) {
            Swal.fire({
                title: 'Avertissement !',
                text: 'Les mots de passe ne correspondent pas.',
                icon: 'warning',
                confirmButtonText: 'Compris',
                confirmButtonColor: 'oklch(49.6% 0.265 301.924)',
                timer: 1000,
                timerProgressBar: true
            })
        }
    }

    return (
        <div className="flex flex-col w-full h-auto justify-center items-center px-6 md:px-80 p gap-y-3 py-10 md:py-32 animate__animated animate__fadeIn">

            <Link to={'/'} className="flex flex-col w-full justify-center items-start px-6 md:px-40">
                <img src="/assets/img/logo.png" className="w-32" alt="Logo" />
            </Link>
            <div className="flex flex-col w-full justify-center items-start px-6 md:px-40">
                <h2 className="text-start text-xl font-semibold">Créer un compte.</h2>
            </div>


            <form onSubmit={handleSubmit} autoComplete="off" className="flex flex-col w-full justify-center items-start px-6 md:px-40 my-6 gap-y-6">
                <div className="flex flex-col w-full">
                    <input type="text" onChange={(e) => setName(e.target.value)} value={name} className="border-[1px] border-gray-900 hover:border-[2px] focus:border-purple-700 transition-all px-4 py-2 rounded-md placeholder:text-black focus:placeholder:text-purple-700 w-full outline-none"
                        name="nom" id="nom" placeholder="Nom / Name"
                    />
                </div>

                <div className="flex flex-col w-full">
                    <input type="text" onChange={(e) => setPrenom(e.target.value)} value={prenom} className="border-[1px] border-gray-900 hover:border-[2px] focus:border-purple-700 transition-all px-4 py-2 rounded-md placeholder:text-black focus:placeholder:text-purple-700 w-full outline-none"
                        name="prenom" id="prenom" placeholder="Prénom / Surname"
                    />
                </div>

                <div className="flex flex-col w-full">
                    <input type="tel" onChange={(e) => setPhone(e.target.value)} value={phone} className="border-[1px] border-gray-900 hover:border-[2px] focus:border-purple-700 transition-all px-4 py-2 rounded-md placeholder:text-black focus:placeholder:text-purple-700 w-full outline-none"
                        name="tel" id="tel" placeholder="Téléphone / Number"
                    />
                </div>

                <div className="flex flex-col w-full">
                    <input type="email" onChange={(e) => setEmail(e.target.value)} value={email} className="border-[1px] border-gray-900 hover:border-[2px] focus:border-purple-700 transition-all px-4 py-2 rounded-md placeholder:text-black focus:placeholder:text-purple-700 w-full outline-none"
                        name="email" id="email" placeholder="Adresse email"
                    />
                </div>

                <div className="flex flex-col w-full justify-center items-center">
                    <input type={`${showPassword ? 'text' : 'password'}`} onChange={(e) => setPassword(e.target.value)} value={password} className="border-[1px] border-gray-900 hover:border-[2px] focus:border-purple-700 transition-all px-4 py-2 rounded-md placeholder:text-black focus:placeholder:text-purple-700 w-full outline-none"
                        name="password" id="password" placeholder="Mot de passe"
                    />
                    <div className="absolute right-[15%] md:right-[30%] cursor-pointer" onClick={() => setShowPassword(!showPassword)}>
                        {
                            showPassword ? (
                                <BsEyeSlash />
                            ) : (
                                <BsEye />
                            )
                        }
                    </div>
                </div>


                <div className="flex flex-col w-full justify-center items-center">
                    <input type={`${showPassword ? 'text' : 'password'}`} onChange={(e) => setConfirmPassword(e.target.value)} value={confirmPassword} className="border-[1px] border-gray-900 hover:border-[2px] focus:border-purple-700 transition-all px-4 py-2 rounded-md placeholder:text-black focus:placeholder:text-purple-700 w-full outline-none"
                        name="confirm_password" id="confirm_password" placeholder="Confirmez le mot de passe"
                    />
                    <div className="absolute right-[15%] md:right-[30%] cursor-pointer" onClick={() => setShowPassword(!showPassword)}>
                        {
                            showPassword ? (
                                <BsEyeSlash />
                            ) : (
                                <BsEye />
                            )
                        }
                    </div>
                </div>

                <button type="submit" className="bg-purple-700 w-full py-2 px-3 text-white text-center rounded-md hover:bg-purple-800 transition font-semibold cursor-pointer">
                    S'inscrire
                </button>
            </form>


            <div className="flex flex-row w-full justify-center items-center gap-x-2">
                <span className="text-sm">Vous possédez déjà un compte ? </span>
                <Link to={'/login'} className="text-purple-700 font-semibold text-sm">
                    Connectez-vous!
                </Link>
            </div>
        </div>
    )
}