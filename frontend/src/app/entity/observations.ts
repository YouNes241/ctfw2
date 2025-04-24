import { Animals } from "./animals";

export interface Observations {
    id?: number,
    date: Date,
    time: Date,
    latitude: number,
    longitude: number,
    animal: Animals,
    description: string,
}
