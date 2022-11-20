const boardForm = get(".form");
const btn = get('.btnClick')
const body = get('.paper-containe');
const boardId = window.location.pathname.substr(7);
const typing = get(".typing");
const chatStatus = get(".chatStatus");
let typingTimer = false;
let authUser;
    window.onload = function () {
        axios.get('/auth/user')
            .then( res => {
                authUser = res.data.authUser;
            })
            .then(() => {
                axios.get(`/board/${boardId}/get_users`).then( res => {
                    let results = res.data.users.filter( user => user.id !== authUser.id);
                    if(results.length > 0){}
                      //  chatWith.innerHTML = results[0].name;
                });
            })
            .then(() => {
                axios.get(`/board/${boardId}/get_models`).then(res => {
                    appendGraphs(res.data.models[0].code);
                    console.log('actualizado');
                });
            })
            .then(() => {
                Echo.join(`board.${boardId}`)
                    .listen('ModelSent', (e) => {
                        appendGraph(e.model.code);
                        console.log('intentando cambiar');
                    });
            });
    }

        boardForm.addEventListener("submit", event => {
            event.preventDefault();
            const modelText = JSON.stringify(app.graph.toJSON());
            if (!modelText) return;
            axios.post('/model/sent', {
                code: modelText,
                board_id: boardId,
            }).then(res => {
                console.log('enviado');
            }).catch(error => {
                console.log(error);
            });
        });
function enviar(){
    const modelText = JSON.stringify(app.graph.toJSON());
    if (!modelText) return;
    axios.post('/model/sent', {
        code: modelText,
        board_id: boardId,
    }).then(res => {
        console.log('enviado');
    }).catch(error => {
        console.log(error);
    });
}

    function appendGraph(code){
        //app.graph.fromJSON( ${code} )
        var objeto = JSON.parse(code);
        app.graph.fromJSON(objeto);
    }
function appendGraphs(code){
    //app.graph.fromJSON( ${code} )
    var objeto = JSON.parse(code);
    app.graph.fromJSON(objeto);
}

    //utils
function sendTypingEvent()
{
    typingTimer = true;
    Echo.join(`chat.${chatId}`)
        .whisper('typing', msgerInput.value.length);
}
function formatDate(date) {
    const d = date.getDate();
    const mo = date.getMonth() + 1;
    const y = date.getFullYear();
    const h = "0" + date.getHours();
    const m = "0" + date.getMinutes();
    return `${d}/${mo}/${y} ${h.slice(-2)}:${m.slice(-2)}`;
}

function get(selector, root = document) {
    return root.querySelector(selector);
}
