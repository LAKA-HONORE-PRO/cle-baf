export default function Hero(){
    return(
        <header className="flex w-full h-[100vh] bg-gray-900 animate__animated animate__fadeIn" style={{ backgroundImage: "url('/assets/img/hero.webp')", backgroundRepeat: "no-repeat", backgroundSize: "cover", backgroundAttachment: "center" }}>
            <div className="absolute w-full h-[100vh] bg-black/50" />

            <div className="absolute flex flex-col w-full h-full justify-center items-center z-10 px-6 gap-y-16">
                <div className="flex flex-col justify-center items-center gap-y-5">
                    <h2 className="text-3xl text-center md:text-5xl font-semibold text-white animate__animated animate__pulse">Centre Linguistique de L'estuaire.</h2>
                    <h2 className="text-xl text-center md:text-2xl italic text-white animate__animated animate__slideInLeft">
                        Transformez votre avenir grâce aux langues !
                    </h2>
                </div>

                <p className="text-white text-center w-full md:w-[70%] text-sm md:text-xl shadow-2xl shadow-black">
                    Au Centre Linguistique de l'estuaire, nous vous offrons des cours innovants et interactifs pour tous les âges et niveaux.
                    Que vous souhaitiez apprendre pour le plaisir, voyager ou progresser professionnellement, notre équipe passionnée est prête à vous guider.
                </p>
            </div>
        </header>
    )
}