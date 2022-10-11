# Diga-Teste

To run the application follow these steps:
  - Download (if needed) [Docker and Docker compose](https://docs.docker.com/desktop/install/windows-install/)
  - Run git clone https://github.com/DanielCSFreitas/Diga-Teste.git
  - Enter the Backend folder
  - On cmd run docker compose up
  - The application is now up and running :)
  
 Routes:
 
  - GET http://localhost:8000/auth/register
  - GET http://localhost:8000/auth/login
  - POST http://localhost:8000/auth/store
    - form-data:
      - name
      - email
      - password
      - password_confirmation
      - _token(Token acquired in the register page)
  - POST http://localhost:8000/auth/check
    - form-data:
      - email
      - password
      - _token(Token acquired in the login page)
      
      
###Routes protected by JWT, first you need to get the token with a valid logged-in user###

  - GET http://localhost:8000/api/v1/movie
    - GET http://localhost:8000/api/v1/movie/movie_id for a specific movie
    - GET http://localhost:8000/api/v1/movie?
      - Query params:
        - orderBy: name, file or date *name is the default one
        - Desc:true *false is the default one
  - PUT http://localhost:8000/api/v1/movie/movie_id
    - form-data:
      - name
      - fileSize
      - tagId(optional)
  - PATCH http://localhost:8000/api/v1/movie/movie_id
    - form-data:
      - name(optional)
      - fileSize(optional)
      - tagId(optional)
  
  - POST http://localhost:8000/api/v1/movie
    - form-data:
      - name
      - fileSize
      - file(optional)
  - POST http://localhost:8000/api/v1/tag
    - form-data:
      - name
  
      
    
