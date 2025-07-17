import type { LevelType } from "./LevelType";
import type { UserType } from "./UserType";

export interface AppartenirType {
    id: number,
    attestation_link?: string,
    is_valider: 0 | 1,
    level: LevelType,
    student: UserType
}