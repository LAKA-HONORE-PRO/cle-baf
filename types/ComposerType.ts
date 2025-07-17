import type { ExamenType } from './ExamenType'
import type {UserType} from './UserType'

export interface ComposerType {
    id: number,
    data: string,
    note: number,
    is_valider: 0 | 1,
    student: UserType,
    examen: ExamenType
}