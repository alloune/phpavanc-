<div>
    <h1>Commande #{{ $tShirt->id }}</h1>
    <p>Le visuel du t-shirt {{ $tShirt->id }} est finalisé.</p>
    <table>
        <thead>
        <th>Taille</th>
        <th>Couleur</th>
        <th>Rendu</th>
        </thead>
        <tbody>
        <td>{{ $tShirt->size }}</td>
        <td>{{ $tShirt->color }}</td>
        <td>En PJ</td>
        </tbody>
    </table>
</div>
