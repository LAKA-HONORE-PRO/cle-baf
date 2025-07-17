import { QuestionType } from "./QuestionType";

export interface ExamenType {
    id: number,
    intitule: string,
    duree: number,
    type: string,
    nombre_de_points: number,
    note_de_passage: number,
    etat: 0 | 1,
    slug: string,
    questions: QuestionType[]
}