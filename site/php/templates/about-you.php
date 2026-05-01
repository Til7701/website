<main>
    <section class="toc">
        <h2>Table of Contents</h2>
        <ul>
        </ul>
    </section>
    <article>
        <table>
            <thead>
            <tr>
                <th>IP Address</th>
                <th>Port</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?= $data->getAboutYouData()->getIpAddress(); ?></td>
                <td><?= $data->getAboutYouData()->getPort(); ?></td>
            </tr>
        </table>
    </article>
</main>
