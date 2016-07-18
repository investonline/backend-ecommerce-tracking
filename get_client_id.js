/**
 * Return the google client id from the first analytics tracker
 * @returns {*}
 */
function get_client_id()
{
    if (typeof ga != 'function' || typeof ga.getAll != 'function' || ga.getAll().length < 1) {
        return '';
    }

    return ga.getAll()[0].get('clientId');
}