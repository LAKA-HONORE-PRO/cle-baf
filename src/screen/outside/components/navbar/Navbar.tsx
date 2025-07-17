import { useState } from "react";
import { AiOutlineClose, AiOutlineMenu } from "react-icons/ai";
import { MdAccountCircle } from "react-icons/md";
import { NavLink } from "react-router-dom";

export default function Navbar() {
    const [mobileNav, setMobileNav] = useState(false);

    return (
        <nav className="flex flex-row w-full h-16 top-0 sticky z-30 bg-gray-200 justify-between items-center px-6">

            <NavLink to={'/'} className="text-black font-semibold">
                <img src="assets/img/logo.png" className="w-28" alt="Logo" />
            </NavLink>

            <ul className="hidden md:flex flex-row justify-center items-center gap-x-10">
                <li>
                    <NavLink to={'/'} className={`text-black font-semibold hover:text-[#4b21c3] transition`}>
                        Accueil
                    </NavLink>
                </li>


                <li>
                    <NavLink to={'/about'} className={`text-black font-semibold hover:text-[#4b21c3] transition`}>
                        A propos
                    </NavLink>
                </li>

                <li>
                    <NavLink to={'/'} className={`text-black font-semibold hover:text-[#4b21c3] transition`}>
                        Cours
                    </NavLink>
                </li>


                <li>
                    <NavLink to={'/'} className={`text-black font-semibold hover:text-[#4b21c3] transition`}>
                        Contact
                    </NavLink>
                </li>


                <li>
                    <NavLink to={'/login'} className={`flex flex-row gap-x-2 bg-purpleColor py-2 px-4 rounded-md transition`}>
                        <span className="text-white font-semibold">
                            Compte
                        </span>
                        <MdAccountCircle className="text-2xl text-white" />
                    </NavLink>
                </li>
            </ul>


            <div className="flex md:hidden" onClick={() => setMobileNav(!mobileNav)}>
                {
                    mobileNav ? (
                        <AiOutlineClose className="text-2xl purpleText animate__animated animate__fadeIn" />
                    ) : (
                        <AiOutlineMenu className="text-2xl purpleText animate__animated animate__fadeIn" />
                    )
                }
            </div>


            <div className={`fixed md:hidden h-[100vh] w-[80%] bg-gray-200 top-16 animate__animated animate__slideInLeft duration-500 ${mobileNav ? 'right-[20%] opacity-100' : 'right-100 opacity-0'}`}>
                <ul className="flex flex-col justify-start items-start gap-y-6 px-6 my-6">
                    <li>
                        <NavLink to={'/'} onClick={()=>setMobileNav(!mobileNav)} className={`text-black font-semibold hover:text-[#4b21c3] transition`}>
                            Accueil
                        </NavLink>
                    </li>


                    <li>
                        <NavLink to={'/'} onClick={()=>setMobileNav(!mobileNav)} className={`text-black font-semibold hover:text-[#4b21c3] transition`}>
                            A propos
                        </NavLink>
                    </li>

                    <li>
                        <NavLink to={'/'} onClick={()=>setMobileNav(!mobileNav)} className={`text-black font-semibold hover:text-[#4b21c3] transition`}>
                            Cours
                        </NavLink>
                    </li>


                    <li>
                        <NavLink to={'/'} onClick={()=>setMobileNav(!mobileNav)} className={`text-black font-semibold hover:text-[#4b21c3] transition`}>
                            Contact
                        </NavLink>
                    </li>


                    <li>
                        <NavLink to={'/login'} onClick={()=>setMobileNav(!mobileNav)} className={`flex flex-row gap-x-2 bg-purpleColor py-2 px-4 rounded-md transition`}>
                            <span className="text-white font-semibold">
                                Compte
                            </span>
                            <MdAccountCircle className="text-2xl text-white" />
                        </NavLink>
                    </li>
                </ul>
            </div>
            
            <div onClick={()=>setMobileNav(!mobileNav)} className={`fixed md:hidden h-[100vh] w-[20%] bg-black/60 top-16 animate__animated animate__slideInRight duration-500 ${mobileNav ? 'left-[80%] opacity-100' : 'left-100 opacity-0'}`} />

        </nav>
    )
}