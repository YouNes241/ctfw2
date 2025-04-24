import { Observations } from "./observations";

export interface Animals {
    id?: number,
    nom_commun: string,
    nom_savant: string,
    embranchement: string,
    classe: string,
    ordre: string,
    sous_ordre: string,
    famille: string,
    genre: string,
    iucn: string,
    description: string,
    observations: Array<Observations>
}
