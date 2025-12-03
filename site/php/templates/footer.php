<footer>
    <input type="checkbox" id="accept-checkbox">
    <input type="checkbox" id="decline-checkbox">
    <div class="cookie-banner">
        <p>This website does not use any Cookies.</p>
        <div>
            <label for="accept-checkbox" class="accept-button button">Accept</label>
            <label for="decline-checkbox" class="decline-button button">Decline</label>
        </div>
    </div>

    <p><?php
        $commitHash = trim(file_get_contents("php/build-info/commit_hash.txt"));
        $gitTreeState = trim(file_get_contents("php/build-info/git_tree_state.txt"));

        $versionString = $commitHash;

        if ($gitTreeState === "dirty") {
            $versionString .= "*";
        }
        echo $versionString;
        ?>
        <br>
        &copy;2025 Tilman Holube, all rights reserved
    </p>
</footer>
