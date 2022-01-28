const shareProfileButton = document.querySelector(".share-profile-button");
const followProfileButton = document.querySelector(".follow-profile-button");
const unfollowProfileButton = document.querySelector(".unfollow-profile-button");
const editProfileButton = document.querySelector(".edit-profile-button");
const profileEditor = document.querySelector(".profile-editor-wrapper");
const closeProfileEditorIcon = document.querySelector(".close-icon");
const saveProfileButton = document.querySelector(".save-button");
const cancelProfileButton = document.querySelector(".cancel-button");

shareProfileButton?.addEventListener("click", () => {
    const textarea = document.createElement("textarea");
    textarea.classList.add("hidden-textarea");
    textarea.value = location.origin + "/profile/" + shareProfileButton.getAttribute("data-id");
    document.body.appendChild(textarea);
    textarea.focus();
    textarea.select();
    document.execCommand("copy");
    document.body.removeChild(textarea);
});

followProfileButton?.addEventListener("click", () => {
    const data = {
        followedUserId: followProfileButton.getAttribute("data-id")
    }
    fetchThenReload("/followUser", data);
});

unfollowProfileButton?.addEventListener("click", () => {
    const data = {
        followedUserId: unfollowProfileButton.getAttribute("data-id")
    }
    fetchThenReload("/unfollowUser", data);
});

editProfileButton?.addEventListener("click", () => {
    profileEditor.setAttribute("data-visible", "true");
});

closeProfileEditorIcon?.addEventListener("click", () => {
    profileEditor.setAttribute("data-visible", "false");
});

cancelProfileButton?.addEventListener("click", () => {
    profileEditor.setAttribute("data-visible", "false");
});

