document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll("div.sourceCode").forEach(block => {
        const btn = document.createElement("button");
        btn.className = "copy-btn";
        btn.textContent = "";
        block.appendChild(btn);
        btn.addEventListener("click", async () => {
            const code = block.querySelector("code");
            if (!code) return;
            try {
                await navigator.clipboard.writeText(code.innerText.trim());
                btn.className = "copy-btn copied";
                setTimeout(() => (btn.className = "copy-btn"), 2000);
            } catch (err) {
                console.error("Copy failed", err);
            }
        });
    });
});
