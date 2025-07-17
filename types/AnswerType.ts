import { QuestionType } from "./QuestionType";

export interface AnswerType {
    id: number,
    intitule: string,
    type: "audio" | "image" | "text",
    is_correct: 0 | 1,
    slug: string,
    question: QuestionType
}