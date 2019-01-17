function api_user(action, data, callback) {
    $.post('/api/user/', {action: action, data: data}, callback);
}