class API {
    constructor() {
        this.user = null;
        this.onReady = [];
    }

    initialize() {
        this.call('user/active', {}, (response) => {
            if (!response.error)
                this.user = response.data;
            else
                this.user = false;

            if (Array.isArray(this.onReady)) {
                for (let i = 0; i < this.onReady.length; i++)
                    this.onReady[i]();

                this.onReady = true;
            }
        });
    }

    call(action, data = {}, callback = null) {
        action = action.split('/');

        if (action.length !== 2)
            throw new Error('Invalid API action');
        else
            $.post('/api/' + action[0] + '/index.php', {action: action[1], data: data}, callback);
    }

    ready(callback) {
        if (this.onReady === true)
            callback();
        else
            this.onReady.push(callback);
    }
}

const api = new API();
api.initialize();