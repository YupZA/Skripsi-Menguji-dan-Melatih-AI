let draggedItem = null;

document.querySelectorAll('.drag-item').forEach(item => {
  item.addEventListener('dragstart', () => {
    draggedItem = item;
    setTimeout(() => item.classList.add('dragging'), 0);
  });

  item.addEventListener('dragend', () => {
    item.classList.remove('dragging');
    draggedItem = null;
  });
});

document.querySelectorAll('.drop-zone').forEach(zone => {
  zone.addEventListener('dragover', e => {
    e.preventDefault();
    zone.classList.add('hover');
  });

  zone.addEventListener('dragleave', () => {
    zone.classList.remove('hover');
  });

  zone.addEventListener('drop', () => {
    zone.classList.remove('hover');

    if (!draggedItem) return;

    const correctType = zone.dataset.accept;
    const itemType = draggedItem.dataset.type;

    zone.appendChild(draggedItem);

    if (correctType === itemType) {
      draggedItem.classList.add('correct');
    } else {
      draggedItem.classList.add('wrong');
    }

    draggedItem.setAttribute('draggable', 'false');
  });
});
