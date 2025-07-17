type HeroType = {
    title: string
}
export default function HeroPage({title}: HeroType) {
    return (
        <header className="flex w-full h-[200px] bg-purple-700 animate__animated animate__fadeIn">
            <div className="absolute w-full h-[200px] bg-black/50" />

            <div className="absolute flex flex-row w-full z-10 justify-center items-center h-[200px]">
                <h2 className="text-xl md:text-3xl font-semibold text-center text-white shadow-2xl shadow-black animate__animated animate__bounce">
                    {
                        title
                    }
                </h2>
            </div>
        </header>
    )
}