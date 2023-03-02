<!-- File: templates/Articles/index.php -->
<h1>Articlessss</h1>
<table class="table-fixed rounded bg-gray-300 border-separate border-spacing-2 border border-slate-500">
    <tr>
        <th class="rounded border border-slate-600">Title</th>
        <th class="rounded border border-slate-600">Created</th>
        <th class="rounded border border-slate-600">Action</th>
    </tr>
    <!-- Here is where we iterate through our $articles query object, printing out article info -->
    <?php foreach ($articles as $article) : ?>
        <tr>
            <td class="rounded border border-slate-700">
                <?= $this->Html->link($article->title, ['action' => 'view', $article->slug]) ?>
            </td>
            <td class="rounded border border-slate-700">
                <?= $article->created->format(DATE_RFC850) ?>
            </td>
            <td class="rounded border border-slate-700">
                <?= $this->Html->link('Edit', ['action' => 'edit', $article->slug]) ?>
                <?= $this->Form->postLink(
                    'Delete',
                    ['action' => 'delete', $article->slug],
                    ['confirm' => 'Are you sure?']
                )
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<?= $this->Html->link('Add Article', ['action' => 'add']) ?>
