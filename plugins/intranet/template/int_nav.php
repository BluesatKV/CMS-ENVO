<ul>
  <!-- Dashboard -->
  <li>
    <a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET, '', '', '', '') ?>">
      <i class="material-icons">dashboard</i>
      <span class="title">Dashboard</span>
    </a>
  </li>
  <!-- House -->
  <li>
    <a href="javascript:;" class="auto">
      <i class="material-icons">home</i>
      <span class="title">Bytové domy</span>
      <span class="arrow"></span>
    </a>
    <ul class="sub-menu">
      <li>
        <a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET, 'house', '', '', '') ?>">
          <span>Domy ve správě</span>
        </a>
      </li>
      <li>
        <a href="javascript:;"><span class="title">Analýza domů</span><span class=" arrow"></span> </a>
        <ul class="sub-menu">
          <li>
            <a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET, 'houselist', 'stats', '', '') ?>">
              <span>Statistiky</span>
            </a>
          </li>
          <li>
            <a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET, 'houselist', '', '', '') ?>">
              <span>Přehled domů</span>
            </a>
          </li>
        </ul>
      </li>
    </ul>
  </li>
</ul>