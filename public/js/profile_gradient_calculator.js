const profileImageWrapper = document.querySelector(".profile-image-wrapper");
const statsArray = document.querySelectorAll(".user-stats .stat-item__number");

const userStats = {
    movies: + statsArray[0].innerHTML.split(" ")[0],
    shows: + statsArray[1].innerHTML.split(" ")[0],
    animes: + statsArray[2].innerHTML.split(" ")[0],
    games: + statsArray[3].innerHTML.split(" ")[0],

    sum: function() {
        return this.movies + this.shows + this.animes + this.games
    },

    notZero: function() {
        return (this.movies !== 0) +
            (this.shows !== 0) +
            (this.animes !== 0) +
            (this.games !== 0);
    }
};

const colors = {
    movies: "#F5B13D",
    shows: "#52AEF4",
    animes: "#45CB85",
    games: "#B497D8",
}

const transitionFactor = Math.floor(20 / userStats.notZero());
const factor = Math.floor((100 - 20) / (userStats.sum() + 1));

profileImageWrapper.style.background = generateGradient();

function generateGradient() {
    let string = "conic-gradient(from 90deg at 50% 50%";
    let current = 0;
    let first = null;
    if (userStats.movies) {
        first = colors.movies;
        string = string.concat(`, ${colors.movies} ${current}%`)
        current += userStats.movies * factor;
        string = string.concat(`, ${colors.movies} ${current}%`)
        current += transitionFactor;
    }
    if (userStats.games) {
        first = first ?? colors.games;
        string = string.concat(`, ${colors.games} ${current}%`)
        current += userStats.games * factor;
        string = string.concat(`, ${colors.games} ${current}%`)
        current += transitionFactor;
    }
    if (userStats.animes) {
        first = first ?? colors.animes;
        string = string.concat(`, ${colors.animes} ${current}%`)
        current += userStats.animes * factor;
        string = string.concat(`, ${colors.animes} ${current}%`)
        current += transitionFactor;
    }
    if (userStats.shows) {
        first = first ?? colors.shows;
        string = string.concat(`, ${colors.shows} ${current}%`)
        current += userStats.shows * factor;
        string = string.concat(`, ${colors.shows} ${current}%`)
        current += transitionFactor;
    }
    string = string.concat(`, ${first} ${current}%)`);
    return string;
}
