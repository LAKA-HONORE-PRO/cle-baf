import type { LessonType } from './LessonType';
import type {LevelType} from './LevelType';

export interface UnitType{
    id: number,
    intitule: string,
    description: string,
    objectifs: string,
    slug: string,
    level: LevelType,
    lessons: LessonType[]
}