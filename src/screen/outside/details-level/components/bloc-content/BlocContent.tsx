type BlocContentType = {
    title: string,
    text: string
}

export default function BlocContent({ title, text }: BlocContentType) {
    return (
        <div className="flex flex-col w-full gap-y-3">
            <div className="flex flex-row w-full">
                <h2 className="text-purple-700 font-semibold italic underline text-sm text-center">
                    {title}
                </h2>
            </div>

            <p className="text-justify text-sm text-black">
                {text}
            </p>
        </div>
    )
}