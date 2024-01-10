let clientId = "5gculwsuw4yxs5dt72suzyirqn2de5";
let clientSecret = "ey1vbe992pc5fy1chhtqb0njia6zro";
const popularGames = [];

function getTwitchAuthorization() {
    let url = `https://id.twitch.tv/oauth2/token?client_id=${clientId}&client_secret=${clientSecret}&grant_type=client_credentials`;

    return fetch(url, {
        method: "POST",
    })
        .then((res) => res.json())
        .then((data) => {
            return data;
        });
}
/*
async function getStreams() {
    const endpoint = "https://api.twitch.tv/helix/games?name=" + GetGameName();

    let authorizationObject = await getTwitchAuthorization();
    let { access_token, expires_in, token_type } = authorizationObject;

    //token_type first letter must be uppercase    
    token_type =
        token_type.substring(0, 1).toUpperCase() +
        token_type.substring(1, token_type.length);

    let authorization = `${token_type} ${access_token}`;

    let headers = {
        authorization,
        "Client-Id": clientId,
    };

    fetch(endpoint, {
        headers,
    })
        .then((res) => res.json())
        .then((data) => renderGames(data));
}
*/
async function getTopGames() {
    const endpoint = "https://api.twitch.tv/helix/games/top";

    let authorizationObject = await getTwitchAuthorization();
    let { access_token, expires_in, token_type } = authorizationObject;

    //token_type first letter must be uppercase    
    token_type =
        token_type.substring(0, 1).toUpperCase() +
        token_type.substring(1, token_type.length);

    let authorization = `${token_type} ${access_token}`;

    let headers = {
        authorization,
        "Client-Id": clientId,
    };

    fetch(endpoint, {
        headers,
    })
        .then((res) => res.json())
        .then((data) => renderTopGames(data));
}
/*
function renderGames(data) {
    console.log(`${JSON.stringify(data)}`)
}
*/
function renderTopGames(data) {

    //displays the top games

    var div = document.getElementById('topGames');     // The parent <div>.
    div.innerHTML = '';

    for (let i = 0; i <= data.data.length; i++) {
        if (data.data[i].name != 'Just Chatting' || data.data[i].name != "Music" || data.data[i].name != "Sports") {
            // Create two <div> elements, one for the name and the other to show the image.
            var divMain = document.createElement('div');
            divMain.classList.add("divMain");
            var img = document.createElement('img');
            divMain.innerText = data.data[i].name;
            img.src = data.data[i].box_art_url;
            console.log(data.data[i].box_art_url)               // The image source from JSON array.
            divMain.appendChild(img);
            div.appendChild(divMain);
        }



        //content.innerText += data.data[i].name;


    }
}
/*
getStreams();*/
getTopGames();
