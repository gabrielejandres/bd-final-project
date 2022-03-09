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
            alert('nao foi iniciar uma pergunta')
        }
    },

    async twoPlataformsQuestion() {
        try{
            const response = await route.get('/question/twoPlatforms');
            return response

        }catch(err){
            alert('nao foi iniciar uma pergunta')
        }
    },

    async notAMovieQuestion() {
        try{
            const response = await route.get('/question/notAMovie');
            return response

        }catch(err){
            alert('nao foi iniciar uma pergunta')
        }
    },

    async numberOfSeasonsQuestion() {
        try{
            const response = await route.get('/question/numberOfSeasons');
            return response

        }catch(err){
            alert('nao foi iniciar uma pergunta')
        }
    },

}