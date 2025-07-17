import { UnitType } from "./UnitType";

export interface LevelType {
    id: number,
    intitule: string,
    description: string,
    objectifs: string,
    slug: string,
    units: UnitType[]
}