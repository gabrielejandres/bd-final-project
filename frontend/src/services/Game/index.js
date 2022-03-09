import axios from 'axios';

const route = axios.create({
    baseURL: 'http://localhost:8000/api',
})

export default{

    async releaseYearQuestion() {
        try{
            const response = await route.get('/question/releaseYear');
            return response

        }catch(err){
            alert('nao foi possível iniciar uma pergunta')
        }
    },

    async twoPlataformsQuestion() {
        try{
            const response = await route.get('/question/twoPlatforms');
            return response

        }catch(err){
            alert('nao foi possível iniciar uma pergunta')
        }
    },

    async notAMovieQuestion() {
        try{
            const response = await route.get('/question/notAMovie');
            return response

        }catch(err){
            alert('nao foi possível iniciar uma pergunta')
        }
    },

    async numberOfSeasonsQuestion() {
        try{
            const response = await route.get('/question/numberOfSeasons');
            return response

        }catch(err){
            alert('nao foi possível iniciar uma pergunta')
        }
    },

    async movieByPlatformQuestion() {
        try{
            const response = await route.get('/question/movieByPlatform');
            return response

        }catch(err){
            alert('nao foi possível iniciar uma pergunta')
        }
    },

    async oldestMovieQuestion() {
        try{
            const response = await route.get('/question/oldestMovie');
            return response

        }catch(err){
            alert('nao foi possível iniciar uma pergunta')
        }
    },

    async oldestSeriesQuestion() {
        try{
            const response = await route.get('/question/oldestSeries');
            return response

        }catch(err){
            alert('nao foi possível iniciar uma pergunta')
        }
    },

    async movieByGenreAndActorQuestion() {
        try{
            const response = await route.get('/question/movieByGenreAndActor');
            return response

        }catch(err){
            alert('nao foi possível iniciar uma pergunta')
        }
    },

    async seriesWithMoreSeasonsQuestion() {
        try{
            const response = await route.get('/question/seriesWithMoreSeasons');
            return response

        }catch(err){
            alert('nao foi possível iniciar uma pergunta')
        }
    },

    async platformWithMoreMediasQuestion() {
        try{
            const response = await route.get('/question/platformWithMoreMedias');
            return response

        }catch(err){
            alert('nao foi possível iniciar uma pergunta')
        }
    },

    async directorWithMoreMoviesQuestion() {
        try{
            const response = await route.get('/question/directorWithMoreMovies');
            return response

        }catch(err){
            alert('nao foi possível iniciar uma pergunta')
        }
    },

    async directorAndActorQuestion() {
        try{
            const response = await route.get('/question/directorAndActor');
            return response

        }catch(err){
            alert('nao foi possível iniciar uma pergunta')
        }
    },

    async directorWithMoreMediasByGenreQuestion() {
        try{
            const response = await route.get('/question/directorWithMoreMediasByGenre');
            return response

        }catch(err){
            alert('nao foi possível iniciar uma pergunta')
        }
    },

    async actorPhotoQuestion() {
        try{
            const response = await route.get('/question/actorPhoto');
            return response

        }catch(err){
            alert('nao foi possível iniciar uma pergunta')
        }
    },

}