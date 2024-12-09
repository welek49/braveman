const { dispatch } = wp.data;
const { addFilter } = wp.hooks;
const { createHigherOrderComponent } = wp.compose;

wp.domReady(() => {
    wp.blocks.setDefaultBlockName('bn/text');

    // Filt odpowiadający za dynamiczne dodawanie kolumnom klas szerokości i offsetu
    wp.hooks.addFilter('editor.BlockEdit', 'my-custom-attributes', (BlockEdit) => {
        return (props) => {
            if (props.name === 'bn/column') {
                const { data } = props.attributes;
                let allClasses = props.attributes.className || '';
    
                // Jeśli istnieją, pobierz klasy kolumn zaczynające się od "col-"
                if (data) {
                    const columnClasses = Object.values(data).flatMap(value => {
                        if (typeof value === 'string' && value.startsWith('col-')) {
                            return value.split(' ');
                        } else {
                            return [];
                        }
                    });

                    // Dodaj nowe klasy kolumn, których nie ma w obecnych klasach
                    columnClasses.forEach(cls => {
                        if (!allClasses.includes(cls)) {
                            allClasses += (allClasses === '' ? '' : ' ') + cls;
                        }
                    });

                    // Usuń klasy zaczynające się na 'col-', które są nieaktualne(zostały zmienione w opcjach)
                    allClasses = allClasses.split(' ').filter(klasa => {
                        if (klasa.startsWith('col-')) {
                            return columnClasses.includes(klasa);
                        } else {
                            return true;
                        }
                    }).join(' ');
                }
    
                props.attributes.className = allClasses;
            }
    
            return <BlockEdit {...props} />;
        };
    });
});