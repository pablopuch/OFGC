import { Season } from "./season";

export class Project{
    id: number;
    season_id: number;
    name: string;
    starDate: Date;
    endDate: Date;
    published: boolean;

    season: Season;
}