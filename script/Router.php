<?php

  switch (get_post_action('Auditoria')) {
      case 'Auditoria':
              header('location: RelatorioAuditoria.php?projeto_id='.$_POST['UpIDId']);
          break;
      default:
      
    }