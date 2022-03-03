import {Component} from '@angular/core';
import {Echo} from 'laravel-echo-ionic';


@Component({
    selector: 'page-hello-ionic',
    templateUrl: 'hello-ionic.html'
})
export class HelloIonicPage {
    echo: any = null;

    constructor() {
        this.echo = new Echo({
            broadcaster: 'socket.io',
            host: 'simple-chat.local:6001',
        });

        this.echo.connector.socket.on('connect', function () {
            console.log('CONNECTED');
        });

        this.echo.connector.socket.on('reconnecting', function () {
            console.log('CONNECTING');
        });

        this.echo.connector.socket.on('disconnect', function () {
            console.log('DISCONNECTED');
        });

        this.echo.channel('chat')
            .listen('.room.general', (data) => {
                console.log(data);
            });
    }
}