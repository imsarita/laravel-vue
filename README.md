About the repository:
    This repository is a book store where you can search, add, edit, delete books.It contains  
    backend: Larvel 9 ,
    frontend: Vue 3,
    packages: {
        pagination: @hennge/vue3-pagination,
        axios: vue-axios,
        router: vue-router,
        vite: @vitejs/plugin-vue,
    }
    
Required: 
    composer
    node

To set-up:
    git clone https://github.com/imsarita/laravel-vue.git
    composer install
    npm install
    php artisan migrate:fresh --seed
    npm run dev

About routes:
  GET|HEAD        api/book .................................... book.index › BookController@index
  POST            api/book .................................... book.store › BookController@store
  GET|HEAD        api/book/{book} ............................... book.show › BookController@show
  PUT|PATCH       api/book/{book} ........................... book.update › BookController@update
  DELETE          api/book/{book} ......................... book.destroy › BookController@destroy
  
  
  


