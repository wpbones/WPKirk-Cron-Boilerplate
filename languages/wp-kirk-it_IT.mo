��          �            x  Y   y     �  "   �       �   &  "   	     ,  �  5  �   �  %   |     �  �   �  O   ~  -   �     �  Q    a   c     �  5   �     	    2	  1   H
  
   z
  �  �
  �   s  %   *     P  �   i  c   U  -   �     �                                         
                        	              Add this new Service Provider to the list of providers in the `/config/plugin.php` file:
 Clear the schedule event Create a Schedule Service Provider Giovambattista Fazioli In the `plugins/Provider` directory, the new provider will be created by default. Of course, you may create your schedule service provider manually and in any directory you prefer. You have to change the namespace accordingly. Load the Schedule Service Provider Overview The `run` method is the method that will be executed when the schedule event is triggered. You should define a unique hook name and recurrence for your schedule event. You may use the protected properties `$hook` and `$recurrence` to set the hook name and recurrence. Of course, you may override the `boot` method to set these properties.    For example, you may set the recurrence from the database or from a configuration file. The cron schedule provider is a simple way to manage cron jobs in WordPress. It allows you to schedule a function to run at a specific time or interval. WP Bones Boilerplate WordPress plugin WP Kirk Cron Boilerplate You don't need to clear the schedule event when you deactivate the plugin. WP Bones will do it for you.
  Anyway, you may use the `clear` method to do any cleanup when the plugin is deactivated. You may create your own schedule service provider by following the steps below: https://github.com/wpbones/WPKirk-Boilerplate https://wpbones.com/ Project-Id-Version: WP Kirk Cron Boilerplate 1.8.0
Report-Msgid-Bugs-To: https://wordpress.org/support/plugin/wp-kirk
PO-Revision-Date: 2024-11-12 13:18+0100
Last-Translator: 
Language-Team: 
Language: it
MIME-Version: 1.0
Content-Type: text/plain; charset=UTF-8
Content-Transfer-Encoding: 8bit
X-Generator: Poedit 3.5
X-Domain: wp-kirk
 Aggiungere questo nuovo Service Provider all'elenco dei fornitori nel file `/config/plugin.php`:
 Cancellare l'evento programmato Creazione di un provider di servizi di pianificazione Giovambattista Fazioli Nella directory `plugins/Provider`, il nuovo provider verrà creato per impostazione predefinita. Naturalmente, puoi creare il tuo Service Provider di pianificazione manualmente e in qualsiasi directory tu preferisca. È necessario modificare lo spazio dei nomi di conseguenza. Caricare il provider di servizi di pianificazione Panoramica Il metodo `run` è il metodo che verrà eseguito quando viene attivato l'evento di pianificazione. È necessario definire un nome di hook univoco e una ricorrenza per l'evento pianificato. È possibile utilizzare le proprietà protette `$hook` e `$recurrence` per impostare il nome dell'hook e la ricorrenza. Naturalmente, è possibile sovrascrivere il metodo 'boot' per impostare queste proprietà. Ad esempio, è possibile impostare la ricorrenza dal database o da un file di configurazione. Il provider di pianificazione cron è un modo semplice per gestire i cron job in WordPress. Consente di pianificare l'esecuzione di una funzione a un'ora o a un intervallo specifico. WP Bones Boilerplate Plugin WordPress WP Kirk Cron Boilerplate Non è necessario cancellare l'evento di pianificazione quando si disattiva il plug-in. WP Bones lo farà per te.
  Ad ogni modo, è possibile utilizzare il metodo `clear` per eseguire qualsiasi pulizia quando il plugin è disattivato. È possibile creare il proprio fornitore di servizi di pianificazione seguendo i passaggi seguenti: https://github.com/wpbones/WPKirk-Boilerplate https://wpbones.com/ 