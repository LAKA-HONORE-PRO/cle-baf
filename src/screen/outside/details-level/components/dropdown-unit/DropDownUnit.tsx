import { useState } from "react"
import { PiPlusCircle } from "react-icons/pi"
import BlocContent from "../bloc-content/BlocContent";

type DropDownUnitProps = {
    title: string,
    description?: string,
    objectifs?: string
}

export default function DropDownUnit({ title, description, objectifs }: DropDownUnitProps) {
    const [content, setContent] = useState(false);

    return (
        <div className={`flex flex-col w-full border-b-[1px] bg-gray-100 border-gray-300 `}>
            <div className={`flex flex-row w-full h-full justify-between px-6 py-3 items-center cursor-pointer ${content ? 'bg-purple-700 text-white' : 'bg-gray-200'} transition`} onClick={() => setContent(!content)}>
                <span className={`${content ? 'text-white' : 'text-black'} font-semibold`}>
                    {title}
                </span>
                <PiPlusCircle className={`text-2xl ${content ? 'rotate-45' : ''} duration-300`} />
            </div>

            {
                content && (
                    <div className="flex flex-col w-full gap-y-6 my-10 px-6 animate__animated animate__fadeIn">
                        <BlocContent title="Description" text={`${description}`} />
                        <BlocContent title="Objectifs" text={`${objectifs}`} />
                    </div>
                )
            }
        </div>
    )
}