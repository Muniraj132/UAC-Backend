<style>
  /* body {
  font-family: "Rubik", sans-serif;
} */



.div-center {
  display: flex;
  justify-content: center;
  margin: 80px 0px;
}



.profile-content {
  width: min(400px , 100%);
  border-radius: 10px;
  background-color: #8ec5fc;
  background-image: linear-gradient(62deg, #21d7d9 0%, #3d4647 100%);
  transition-property: opacity, transform;
  transition-duration: calc(700ms);
  transition-delay: 0s;
}

.details {
  position: relative;
  width: 100%;
}

.profile-name {
  width: 100%;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}



.profile-name h4 {
  /* font-size: 16px; */
  white-space: nowrap;
}

.profile-name p {
  /* font-size: 14px; */
  font-weight: 300;
}

.avatar {
  width: 100%;
  text-align: center;
}


.profile-name {
  transition-property: opacity, transform;
  transition-duration: calc(700ms / 2);
  transition-delay: 0s;
  padding-bottom: 10px;
}



.socails {
    display: flex;
    gap: 0.5em;

    img {
        width: auto;
        transition-property: opacity, transform;
        transition-duration: calc(700 / 3);
        transition-delay: 0s;
    }
}
</style>
<aside class="control-sidebar "  >
  <div class="container">
    <div class="div-center">
        <div class="profile-content">
            <div class="avatar">
                <img src="https://img.icons8.com/?size=192&id=20751&format=png" alt="avatar" />
            </div>
            <div class="details">
                <div class="profile-name">
                    <h4>{{$auth->name." ".$auth->surname }}</h4>
                    <p style="color: white;">{{ $auth->email }}</p>
                    <p style="color: white;">{{ $auth->role }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
</aside>
