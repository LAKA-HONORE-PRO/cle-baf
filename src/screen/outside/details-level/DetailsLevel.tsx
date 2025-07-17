import { Link, useParams } from "react-router-dom";
import HeroPage from "../components/hero-page/HeroPage";
import DropDownUnit from "./components/dropdown-unit/DropDownUnit";
import { BiLogIn } from "react-icons/bi";
import { FetchService } from "../../../../utils/fetchServices";
import { useQuery } from "@tanstack/react-query";
import Loader from "../../loader/Loader";

export default function DetailsLevel() {
    const { slug } = useParams();

    async function getLevels() {
        const response = await FetchService.fetch("levels", "get");
        if (response.error) {
            console.log(response);
        }

        return response.datas;
    }

    const { isLoading, data } = useQuery({ queryKey: ["levels"], queryFn: getLevels });

    if (isLoading || !data) return <Loader />

    const units = [
        {
            id: 1,
            intitule: "Introduction à la linguistique",
            description:
                "Cette unité d’enseignement propose une vue d’ensemble des fondements théoriques et méthodologiques de la linguistique moderne. Elle explore l’évolution historique de la discipline, ses principales branches (phonétique, syntaxe, sémantique, etc.) ainsi que les outils d’analyse du langage humain.",
            objectifs:
                "Acquérir une compréhension générale de la linguistique, identifier les grands courants de pensée linguistique, et développer une première capacité d’analyse des phénomènes langagiers à l’aide d’outils de base.",
            slug: "introduction-linguistique",
        },
        {
            id: 2,
            intitule: "Phonétique et phonologie",
            description:
                "Cette unité se concentre sur l’étude des sons du langage, en distinguant la phonétique articulatoire, acoustique et auditive, ainsi que la phonologie, qui examine la manière dont les sons fonctionnent dans les systèmes linguistiques.",
            objectifs:
                "Maîtriser les techniques de transcription phonétique, comprendre les articulations phonologiques dans différentes langues, et analyser les oppositions phonémiques et les processus phonologiques.",
            slug: "phonetique-phonologie",
        },
        {
            id: 3,
            intitule: "Morphologie",
            description:
                "L’unité explore la structure interne des mots en identifiant les plus petites unités de sens appelées morphèmes. Elle aborde les processus de dérivation, de flexion, de composition, et les différences typologiques entre langues.",
            objectifs:
                "Savoir segmenter des mots en morphèmes, comprendre les mécanismes de formation des mots et leur rôle grammatical, et comparer des structures morphologiques entre diverses langues.",
            slug: "morphologie",
        },
        {
            id: 4,
            intitule: "Syntaxe",
            description:
                "Cette unité se penche sur la manière dont les mots s’organisent pour former des phrases grammaticalement correctes. Elle couvre la grammaire générative, les structures syntaxiques, les relations entre constituants et les dépendances.",
            objectifs:
                "Comprendre les règles de construction des phrases simples et complexes, analyser des arbres syntaxiques, et reconnaître les fonctions grammaticales dans une perspective comparative.",
            slug: "syntaxe",
        },
        {
            id: 5,
            intitule: "Sémantique",
            description:
                "L’unité porte sur l’étude du sens en linguistique, en analysant le sens des mots, des phrases et leur interprétation dans différents contextes. Elle aborde des notions clés telles que la référence, la vérité, les inférences et l’ambiguïté.",
            objectifs:
                "Être capable d’analyser des expressions linguistiques sous l’angle de leur sens, identifier les mécanismes d’ambiguïté et de polysémie, et utiliser des outils d’analyse sémantique formelle.",
            slug: "semantique",
        },
        {
            id: 6,
            intitule: "Pragmatique",
            description:
                "Cette unité examine le langage dans son contexte d’usage réel. Elle étudie comment les locuteurs utilisent le langage pour accomplir des actions, comment ils interprètent ce qui est dit selon la situation, et comment ils gèrent les implicatures.",
            objectifs:
                "Comprendre les principes de la communication implicite, analyser des actes de langage (promesse, question, ordre), et reconnaître l’influence du contexte sur l’interprétation des énoncés.",
            slug: "pragmatique",
        },
        {
            id: 7,
            intitule: "Acquisition des langues",
            description:
                "Cette unité explore comment les humains acquièrent leur(s) langue(s), que ce soit la langue maternelle ou une langue étrangère. Elle couvre les théories psycholinguistiques, le développement linguistique chez l’enfant, et les stratégies d’apprentissage des langues secondes.",
            objectifs:
                "Identifier les étapes clés de l’acquisition linguistique, comparer les processus d’acquisition de la L1 et de la L2, et évaluer l’impact de l’environnement et de l’âge sur l’apprentissage.",
            slug: "acquisition-langues",
        },
        {
            id: 8,
            intitule: "Sociolinguistique",
            description:
                "Cette unité analyse les relations entre langue et société. Elle explore la variation linguistique selon les groupes sociaux, les régions, le genre ou l’âge, et s’intéresse aux phénomènes de contact de langues, diglossie, et bilinguisme.",
            objectifs:
                "Comprendre comment le langage reflète et influence les structures sociales, analyser les phénomènes de variation et de changement linguistique, et mener des enquêtes sociolinguistiques de terrain.",
            slug: "sociolinguistique",
        },
        {
            id: 9,
            intitule: "Didactique des langues",
            description:
                "L’unité examine les méthodes et approches pédagogiques utilisées pour enseigner les langues. Elle traite des stratégies d’enseignement, de l’élaboration de supports, de l’évaluation des compétences et de l’intégration des outils numériques.",
            objectifs:
                "Acquérir une connaissance des méthodes traditionnelles et innovantes en didactique, concevoir des séquences d’apprentissage efficaces, et adapter l’enseignement aux besoins et aux profils des apprenants.",
            slug: "didactique-langues",
        },
        {
            id: 10,
            intitule: "Traduction et interprétation",
            description:
                "Cette unité propose une introduction aux principes fondamentaux de la traduction écrite et de l’interprétation orale. Elle aborde les techniques, les outils numériques, les types de traduction (littéraire, technique, juridique, etc.), et les défis liés à l’équivalence.",
            objectifs:
                "Développer des compétences de traduction interlinguistique, reconnaître les différences culturelles et linguistiques dans les textes, et maîtriser les stratégies d’interprétation dans divers contextes professionnels.",
            slug: "traduction-interpretation",
        },
    ];



    return (
        <>
            <HeroPage title={`${slug}`} />

            <div className="flex flex-col md:flex-row w-full justify-center items-starr gap-y-10 md:gap-x-10 px-6 py-20">
                <div className="flex flex-col w-full md:w-4/6 gap-y-10">
                    <div className="flex flex-col gap-y-6 bg-white p-6 rounded-md">

                        <div className="flex flex-col w-full gap-y-2">
                            <div className="flex flex-col-reverse md:flex-row w-full gap-y-2 md:gap-y-0 justify-between items-start md:items-center">
                                <h2 className="font-semibold text-purple-700 text-sm md:text-2xl">
                                    Description du niveau.
                                </h2>

                                <Link to={'/login'} className="flex flex-row items-center gap-x-2 px-2 md:px-6 py-2 border-[1px] border-purple-700 rounded-md hover:bg-purple-700 transition text-sm group">
                                    <span className="text-purple-700 transition font-semibold group-hover:text-white">
                                        Connectez-vous
                                    </span>
                                    <BiLogIn className="hidden group-hover:flex animate__animated animate__slideInLeft duration-300 text-white text-xl" />
                                </Link>
                            </div>
                            <div className="flex h-[2px] bg-purple-700 w-full" />
                        </div>

                        <p className="text-justify text-black text-sm">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Necessitatibus quae expedita voluptate quidem dignissimos tenetur placeat optio nemo nulla architecto similique quam nobis, excepturi eum facilis enim itaque harum deserunt!
                            Asperiores tempore eligendi quo magni est beatae quasi ea porro, eum, aperiam optio esse nisi aut, sequi laudantium vel libero ad! Explicabo ab amet cupiditate deleniti, temporibus nisi at laborum?
                            Commodi assumenda adipisci corporis ipsum iusto vero animi voluptatem. Repellat odit at ut repudiandae! Modi saepe distinctio dolorum possimus sequi, voluptatum velit fuga, vero veritatis, soluta molestiae ad culpa dicta!
                        </p>
                    </div>

                    <div className="flex flex-col w-full bg-white rounded-md p-6 gap-y-6">
                        <div className="flex flex-col gap-y-2">
                            <h2 className="font-semibold text-purple-700 text-sm md:text-2xl">
                                Unités d'enseignements.
                            </h2>
                            <div className="flex h-[2px] bg-purple-700 w-full" />
                        </div>


                        <div className="flex flex-col w-full">

                            {
                                units.map((unit: any, index: number) => (
                                    <DropDownUnit title={unit.intitule} objectifs={unit.objectifs} description={unit.description} key={index} index={++index} />
                                ))
                            }

                        </div>
                    </div>
                </div>

                <div className="flex flex-col w-full md:w-2/6 gap-y-6 bg-white p-6 rounded-md">

                    <div className="flex flex-col gap-y-2">
                        <h2 className="font-semibold text-purple-700 text-sm md:text-2xl">
                            Objectifs du niveau.
                        </h2>
                        <div className="flex h-[2px] bg-purple-700 w-full" />
                    </div>

                    <p className="text-justify text-black text-sm">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Necessitatibus quae expedita voluptate quidem dignissimos tenetur placeat optio nemo nulla architecto similique quam nobis, excepturi eum facilis enim itaque harum deserunt!
                        Asperiores tempore eligendi quo magni est beatae quasi ea porro, eum, aperiam optio esse nisi aut, sequi laudantium vel libero ad! Explicabo ab amet cupiditate deleniti, temporibus nisi at laborum?
                        Commodi assumenda adipisci corporis ipsum iusto vero animi voluptatem. Repellat odit at ut repudiandae! Modi saepe distinctio dolorum possimus sequi, voluptatum velit fuga, vero veritatis, soluta molestiae ad culpa dicta!
                    </p>
                </div>
            </div>
        </>
    )
}