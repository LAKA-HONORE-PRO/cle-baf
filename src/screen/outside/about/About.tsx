import HeroPage from "../components/hero-page/HeroPage";

export default function About() {
    return (
        <>
            <HeroPage title={'A propos de nous'} />
            <div className="flex flex-col w-full h-auto py-20">
                <div className="flex flex-col md:flex-row w-full justify-center items-start gap-y-10 md:gap-x-10 px-6">
                    <div className="flex w-full md:w-2/6 overflow-hidden">
                        <img src="/assets/img/about.webp" className="hover:scale-105 duration-700" alt="about-image" />
                    </div>

                    <div className="flex flex-col w-full md:w-3/6 gap-y-3">
                        <h2 className="title-font text-3xl text-center md:text-start text-purple-700">
                            Le Centre Linguistique de l'Estuaire,
                        </h2>

                        <div className="flex flex-col gap-y-6">
                            <p className="text-black text-justify">
                                est une plateforme dédiée à l'apprentissage des langues, conçue pour offrir un enseignement accessible,
                                interactif et de qualité. Que vous soyez débutant ou avancé, notre approche pédagogique repose sur des méthodes
                                modernes, centrées sur la pratique orale, la compréhension interculturelle et la progression personnalisée.
                            </p>

                            <p className="text-black text-justify">
                                Nous proposons des cours en ligne et en présentiel, adaptés à tous les profils : étudiants, professionnels,
                                voyageurs ou passionnés de langues. Notre équipe d’enseignants expérimentés vous accompagne à chaque étape de
                                votre parcours linguistique avec rigueur, bienveillance et passion.
                            </p>

                            <p className="text-black italic font-semibold text-center md:text-justify">
                                Rejoignez une communauté dynamique et ouverte sur le monde — où apprendre une langue, c’est aussi découvrir une culture.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </>
    )
}