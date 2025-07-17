import type { UnitType } from "./UnitType";

export interface LessonType {
    id: number,
    intitule: string,
    description: string,
    objectifs: string,
    type: "audio" | "video" | "text",
    lien?: string,
    slug: string,
    unit: UnitType
}