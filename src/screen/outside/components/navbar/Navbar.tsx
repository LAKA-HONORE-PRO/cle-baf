import { useState } from "react";
import { AiOutlineClose, AiOutlineMenu, AiOutlineExport } from "react-icons/ai";
import { BiChevronDown } from "react-icons/bi";
import { MdAccountCircle } from "react-icons/md";
import { Link, NavLink } from "react-router-dom";
import { FetchService } from "../../../../../utils/fetchServices";
import { useQuery } from "@tanstack/react-query";
import Loader from "../../../loader/Loader";
import type { LevelType } from "../../../../../types/LevelType"

export default function Navbar() {
    const [mobileNav, setMobileNav] = useState(false);
    const [cours, setCours] = useState(false);

    async function getLevels() {
        const response = await FetchService.fetch("levels", "get");
        if (response.error) {
            console.log(response);
        }

        return response.datas;
    }

    const { isLoading, data } = useQuery({ queryKey: ["levels"], queryFn: getLevels });

    if (isLoading || !data) return <Loader />

    return (
        <>
            <nav className="flex flex-row w-full h-16 top-0 sticky z-30 bg-gray-200 justify-between items-center">

                <NavLink to={'/'} className="text-black font-semibold">
                    <img src="/assets/img/logo.png" className="w-28" alt="Logo" />
                </NavLink>


                {
                    cours && (
                        <>
                            <div className={`fixed hidden md:flex flex-col h-[100vh] w-full top-16 animate__animated animate__fadeIn`}>

                                <div className="grid grid-cols-4 w-full h-auto gap-6 bg-gray-200 py-10 px-40 border-t-[1px] border-gray-900">
                                    <div className="flex flex-col gap-y-2 justify-center items-start">
                                        <h2 className="font-semibold text-black text-xl">
                                            Nos formations
                                        </h2>
                                        <span className="text-sm text-black">
                                            100% en ligne et à votre rythme.
                                        </span>
                                        <Link to={'https://insamtechs.com/videotheque'} className="flex flex-row items-center gap-x-2 px-6 py-2 border-[1px] border-purple-700 rounded-md hover:bg-purple-700 transition text-sm group" target="_blank">
                                            <span className="text-purple-700 font-semibold group-hover:text-white transition">
                                                Accédez à votre vidéothèque
                                            </span>
                                            <AiOutlineExport className="hidden group-hover:flex animate__animated animate__slideInLeft duration-300 text-white text-xl" />
                                        </Link>
                                    </div>

                                    {
                                        data.data.map((level: LevelType, index: number) => (

                                            <Link key={index} to={'/details-level/' + level.slug} onClick={() => setCours(!cours)} className="flex flex-col gap-y-2 hover:bg-gray-300 justify-center transition-all items-start p-3 rounded-md">
                                                <h2 className="font-semibold text-purple-700 text-xl">
                                                    {level.intitule}
                                                </h2>
                                                <span className="text-sm text-black text-justify">
                                                    {
                                                        level.description.slice(0, 150) + "..."
                                                    }
                                                </span>

                                            </Link>
                                        ))
                                    }

                                </div>

                                <div onClick={() => setCours(!cours)} className="flex-1 w-full bg-black/50 cursor-pointer" />
                            </div>

                        </>
                    )
                }




                <ul className="hidden md:flex flex-row justify-center items-center gap-x-10 px-6">
                    <li>
                        <NavLink to={'/'} onClick={() => setCours(false)} className={`text-black font-semibold hover:text-purple-700 transition`}>
                            Accueil
                        </NavLink>
                    </li>


                    <li>
                        <NavLink to={'/about'} onClick={() => setCours(false)} className={`text-black font-semibold hover:text-purple-700 transition`}>
                            A propos
                        </NavLink>
                    </li>

                    <li>
                        <button type="button" onClick={() => setCours(!cours)} className={`flex flex-row text-black items-center font-semibold hover:text-purple-700 transition cursor-pointer`}>
                            <span>
                                Formations
                            </span>
                            <BiChevronDown className={`text-2xl ${cours ? 'rotate-180' : ''} duration-300`} />
                        </button>
                    </li>


                    <li>
                        <NavLink to={'/'} onClick={() => setCours(false)} className={`text-black font-semibold hover:text-purple-700 transition`}>
                            Contact
                        </NavLink>
                    </li>


                    <li>
                        <NavLink to={'/login'} onClick={() => setCours(false)} className={`flex flex-row gap-x-2 bg-purple-700 py-2 px-4 rounded-md transition`}>
                            <span className="text-white font-semibold">
                                Compte
                            </span>
                            <MdAccountCircle className="text-2xl text-white" />
                        </NavLink>
                    </li>
                </ul>


                <div className="flex md:hidden px-6" onClick={() => setMobileNav(!mobileNav)}>
                    {
                        mobileNav ? (
                            <AiOutlineClose className="text-2xl purpleText animate__animated animate__fadeIn" />
                        ) : (
                            <AiOutlineMenu className="text-2xl purpleText animate__animated animate__fadeIn" />
                        )
                    }
                </div>


                <div className={`fixed md:hidden h-[100vh] w-[80%] bg-gray-200 top-16 animate__animated animate__slideInLeft duration-500 overflow-y-scroll ${mobileNav ? 'right-[20%] opacity-100' : 'right-100 opacity-0'}`}>
                    <ul className="flex flex-col justify-start items-start gap-y-6 px-6 my-6">
                        <li>
                            <NavLink to={'/'} onClick={() => setMobileNav(!mobileNav)} className={`text-black font-semibold hover:text-purple-700 transition`}>
                                Accueil
                            </NavLink>
                        </li>


                        <li>
                            <NavLink to={'/about'} onClick={() => setMobileNav(!mobileNav)} className={`text-black font-semibold hover:text-purple-700 transition`}>
                                A propos
                            </NavLink>
                        </li>

                        <li>
                            <button type="button" onClick={() => setCours(!cours)} className={`flex flex-row text-black items-center font-semibold hover:text-purple-700 transition`}>
                                <span>
                                    Formations
                                </span>
                                <BiChevronDown className={`text-2xl ${cours ? 'rotate-180' : ''} duration-300`} />
                            </button>

                            {
                                cours && (
                                    <>
                                        <div className={`flex flex-col h-auto w-full animate__animated animate__fadeIn`}>

                                            <div className="flex flex-col w-full h-auto bg-gray-200 py-3 gap-y-3 border-t-[1px] border-gray-900">
                                                <div className="flex flex-col gap-y-2 justify-center items-start">
                                                    <h2 className="font-semibold text-black text-xl">
                                                        Nos formations
                                                    </h2>
                                                    <span className="text-sm text-black">
                                                        100% en ligne et à votre rythme.
                                                    </span>
                                                    <Link to={'https://insamtechs.com/videotheque'} onClick={() => setMobileNav(!mobileNav)} className="text-purple-700 font-semibold px-6 py-2 border-[1px] border:purple-700 hover:text-white hover:bg-purple-700 transition text-sm" target="_blank">
                                                        Accédez à votre vidéothèque.
                                                    </Link>
                                                </div>

                                                {
                                                    data.data.map((level: LevelType, index: number) => (

                                                        <Link key={index} to={'/details-level/' + level.slug} onClick={() => setMobileNav(!mobileNav)} className="flex flex-col gap-y-2 hover:bg-gray-300 justify-center transition-all items-start p-3 rounded-md">
                                                            <h2 className="font-semibold text-purple-700 text-xl">
                                                                {level.intitule}
                                                            </h2>
                                                            <span className="text-sm text-black text-justify">
                                                                {
                                                                    level.description.slice(0, 150) + "..."
                                                                }
                                                            </span>

                                                        </Link>
                                                    ))
                                                }
                                            </div>

                                        </div>

                                    </>
                                )
                            }
                        </li>


                        <li>
                            <NavLink to={'/'} onClick={() => setMobileNav(!mobileNav)} className={`text-black font-semibold hover:text-purple-700 transition`}>
                                Contact
                            </NavLink>
                        </li>


                        <li>
                            <NavLink to={'/login'} onClick={() => setMobileNav(!mobileNav)} className={`flex flex-row gap-x-2 bg-purple-700 py-2 px-4 rounded-md transition`}>
                                <span className="text-white font-semibold">
                                    Compte
                                </span>
                                <MdAccountCircle className="text-2xl text-white" />
                            </NavLink>
                        </li>
                    </ul>
                </div>

                <div onClick={() => setMobileNav(!mobileNav)} className={`fixed md:hidden h-[100vh] w-[20%] bg-black/60 top-16 animate__animated animate__slideInRight duration-500 ${mobileNav ? 'left-[80%] opacity-100' : 'left-100 opacity-0'}`} />

            </nav>

        </>
    )
}