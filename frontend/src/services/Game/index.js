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
            alert('nao foi possivel criar usuario')
        }
    },

    async twoPlataformsQuestion() {
        try{
            const response = await route.get('/question/twoPlatforms');
            return response

        }catch(err){
            alert('nao foi possivel criar usuario')
        }
    },

    async notAMovieQuestion() {
        try{
            const response = await route.get('/question/notAMovie');
            return response

        }catch(err){
            alert('nao foi possivel criar usuario')
        }
    },

    async numberOfSeasonsQuestion() {
        try{
            const response = await route.get('/question/numberOfSeasons');
            return response

        }catch(err){
            alert('nao foi possivel criar usuario')
        }
    },

}