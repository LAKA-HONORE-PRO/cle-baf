export default function Loader(){
    return(
        <div className="absolute flex flex-col z-50 w-full h-[100vh] justify-center items-center bg-gray-200 gap-y-3">
            <img src="/assets/img/logo.png" alt="Logo" className="animate-pulse w-32" />
            <h2 className="text-purple-700 font-semibold italic">
                Loading ...
            </h2>
        </div>
    )
}