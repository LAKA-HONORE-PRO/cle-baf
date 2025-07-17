import { HiHome } from "react-icons/hi";
import { Link } from "react-router-dom";

export default function NotFound(){
    return(
        <div className="flex flex-col w-full justify-center items-center h-[100vh] px-6 gap-y-7">
            <img src="assets/svg/notfound.webp" className="w-96 animate-pulse" alt="NotFound-Svg" />
            <span className="text-center">Cette page n'est pas disponible pour le moment!</span>
            <Link to={'/'} className="flex flex-row bg-purple-700 hover:bg-purple-800 transition py-2 px-6 items-center gap-x-2 rounded-md">
                <span className="text-white font-semibold">Accueil</span>
                <HiHome  className="text-white font-semibold"/>
            </Link>
        </div>
    )
}