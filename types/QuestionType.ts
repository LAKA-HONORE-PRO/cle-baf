import { AnswerType } from "./AnswerType";
import { ExamenType } from "./ExamenType";

export interface QuestionType {
    id: number,
    intitule: string,
    type: "audio" | "image" | "text",
    nombre_de_points: number,
    slug: string,
    examen: ExamenType,
    answers: AnswerType[]
}