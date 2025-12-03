document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll("div.sourceCode").forEach(block => {
        const btn = document.createElement("button");
        btn.className = "copy-btn";
        btn.textContent = "Copy";
        block.appendChild(btn);
        btn.addEventListener("click", async () => {
            const code = block.querySelector("code");
            if (!code) return;
            try {
                await navigator.clipboard.writeText(code.innerText.trim());
                btn.textContent = "Copied!";
                setTimeout(() => (btn.textContent = "Copy"), 2000);
            } catch (err) {
                console.error("Copy failed", err);
            }
        });
    });
});
