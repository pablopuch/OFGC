import { Time } from "@angular/common";
import { Project } from "./project";
import { Room } from "./room";
import { Typeshedule } from "./type_shedule";

export class Shedule{
    id: number;
    project_id: number;
    type_id: number;
    room_id: number;
    date: Date;
    hour_range: Time;
    note: string;
    
    room: Room;
    project: Project;
    typeshedule: Typeshedule;
}