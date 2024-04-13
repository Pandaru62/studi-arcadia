
<div class="alert alert-warning mt-4" role="alert">
    <i class="fa-solid fa-triangle-exclamation"></i> Seuls les employés du zoo sont autorisés à se connecter.
</div>

<section id="login">

    <div class="row bg-arc-mint-green py-3 my-5">
        <h2>Se connecter</h2>

        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="userEmail" class="form-label">Email de connexion :</label>
                <input type="email" class="form-control" id="userEmail" name="userEmail" placeholder="user@email.fr">
            </div>
            <div class="mb-3">
                <label for="userPassword" class="form-label">Mot de passe :</label>
                <input type="password" class="form-control" id="userPassword" name="userPassword">
            </div>
            
            <input class="btn btn-arc-dark" name="ContactForm" type="login" value="Se connecter"></input>

        </form>
    </div>

