/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package GUI;

import com.digitalpersona.onetouch.DPFPGlobal;
import com.digitalpersona.onetouch.DPFPSample;
import com.digitalpersona.onetouch.capture.DPFPCapture;
import com.digitalpersona.onetouch.capture.event.DPFPDataEvent;
import com.digitalpersona.onetouch.capture.event.DPFPDataListener;
import com.digitalpersona.onetouch.capture.event.DPFPReaderStatusEvent;
import com.digitalpersona.onetouch.capture.event.DPFPReaderStatusListener;
import java.awt.Graphics2D;
import java.awt.Image;
import java.awt.event.ComponentAdapter;
import java.awt.event.ComponentEvent;
import java.awt.geom.AffineTransform;
import java.awt.image.AffineTransformOp;
import java.awt.image.BufferedImage;
import java.io.File;
import java.io.IOException;
import javax.imageio.ImageIO;
import javax.swing.ImageIcon;
import javax.swing.JFileChooser;
import javax.swing.JFrame;
import org.jvnet.substance.SubstanceLookAndFeel;

/**
 *
 * @author Duber
 */

public class CapturarHuella extends javax.swing.JDialog {

    /**
     * Creates new form CapturarHuella
     */
    private DPFPCapture lector = DPFPGlobal.getCaptureFactory().createCapture() ; 
    public String directorio_str="";
    public CapturarHuella(java.awt.Frame parent, boolean modal) {
        super(parent, modal);
        initComponents();
        String directorio_base = new File ("."). getAbsolutePath();
        directorio.setText("Se Descargara En = "+directorio_base);
        
        this.addComponentListener(new ComponentAdapter() {
            @Override
            public void componentShown(ComponentEvent e) {
                init();
                start();
            }

            @Override
            public void componentHidden(ComponentEvent e) {
                
            }
            
        });
    }
    protected void init(){
        lector.addDataListener((DPFPDataEvent dpfpde) -> {
            procesarHuella(dpfpde.getSample());
        });
        lector.addReaderStatusListener(new DPFPReaderStatusListener() {
            @Override
            public void readerConnected(DPFPReaderStatusEvent dpfprs) {
                throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
            }

            @Override
            public void readerDisconnected(DPFPReaderStatusEvent dpfprs) {
                throw new UnsupportedOperationException("Not supported yet."); //To change body of generated methods, choose Tools | Templates.
            }
        });
    }
    protected void procesarHuella(DPFPSample sample){
        Image image = DPFPGlobal.getSampleConversionFactory().createImage(sample);
        drawPicture(image);
        
    }
    public void drawPicture(Image image){
        BufferedImage bufferedImage= new BufferedImage(image.getWidth(null), image.getHeight(null),BufferedImage.TYPE_INT_ARGB);
        Graphics2D bGr= bufferedImage.createGraphics();
        bGr.drawImage(image, 0,0, null);
        bGr.dispose();
        
        AffineTransform tx = new AffineTransform();
        tx.rotate(Math.toRadians(180),bufferedImage.getWidth()/2,bufferedImage.getHeight()/2);
        AffineTransformOp op= new AffineTransformOp(tx,AffineTransformOp.TYPE_BILINEAR);
        bufferedImage= op.filter(bufferedImage, null);
        jLabel2.setIcon(new ImageIcon(image.getScaledInstance(jLabel2.getWidth(), jLabel2.getHeight(), Image.SCALE_DEFAULT)));
        
        try {
    BufferedImage bi = bufferedImage;  // retrieve image
    File outputfile;
    String nombreArchivo="huella.png";
    if(!jtText_nombre_archivo.getText().equalsIgnoreCase("")){
        nombreArchivo="CUS_"+jtText_nombre_archivo.getText()+"_"+nombreArchivo;
    }
    if(directorio_str.equalsIgnoreCase("")){
         outputfile = new File(nombreArchivo);    
    }else{
        outputfile = new File(directorio_str+"\\"+nombreArchivo);
    }
    
    ImageIO.write(bi, "png", outputfile);
      } catch (IOException e) {
        // handle exception
    }
    }
    public void start(){
        lector.startCapture();
    }
    /**
     * This method is called from within the constructor to initialize the form.
     * WARNING: Do NOT modify this code. The content of this method is always
     * regenerated by the Form Editor.
     */
    
    // <editor-fold defaultstate="collapsed" desc="Generated Code">//GEN-BEGIN:initComponents
    private void initComponents() {

        jLabel1 = new javax.swing.JLabel();
        jLabel2 = new javax.swing.JLabel();
        jLabel3 = new javax.swing.JLabel();
        jLabel4 = new javax.swing.JLabel();
        jtText_nombre_archivo = new javax.swing.JTextField();
        jLabel5 = new javax.swing.JLabel();
        jButton1 = new javax.swing.JButton();
        directorio = new javax.swing.JLabel();
        jlabelnombrearchivo = new javax.swing.JLabel();

        setDefaultCloseOperation(javax.swing.WindowConstants.DISPOSE_ON_CLOSE);

        jLabel1.setFont(new java.awt.Font("Cambria", 0, 36)); // NOI18N
        jLabel1.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel1.setText("Lector de Huellas CRM");

        jLabel2.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel2.setText("Donde aparecera huella");

        jLabel3.setFont(new java.awt.Font("Consolas", 2, 8)); // NOI18N
        jLabel3.setHorizontalAlignment(javax.swing.SwingConstants.CENTER);
        jLabel3.setText("Desarrollado Por Duber Pesca");

        jLabel4.setFont(new java.awt.Font("Consolas", 3, 8)); // NOI18N
        jLabel4.setText("Con la ayuda del Espiritu Santo :)");

        jtText_nombre_archivo.addKeyListener(new java.awt.event.KeyAdapter() {
            public void keyReleased(java.awt.event.KeyEvent evt) {
                jtText_nombre_archivoKeyReleased(evt);
            }
        });

        jLabel5.setText("ID CUSTOMER");

        jButton1.setText("Cambiar Directorio donde se guardara la imagen");
        jButton1.addActionListener(new java.awt.event.ActionListener() {
            public void actionPerformed(java.awt.event.ActionEvent evt) {
                jButton1ActionPerformed(evt);
            }
        });

        directorio.setFont(new java.awt.Font("Cambria", 0, 18)); // NOI18N
        directorio.setText("Se Descargara En :");

        jlabelnombrearchivo.setFont(new java.awt.Font("Cambria", 0, 18)); // NOI18N
        jlabelnombrearchivo.setText("El Nombre que tendra es : huella.png");

        javax.swing.GroupLayout layout = new javax.swing.GroupLayout(getContentPane());
        getContentPane().setLayout(layout);
        layout.setHorizontalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addComponent(jLabel1, javax.swing.GroupLayout.DEFAULT_SIZE, 1072, Short.MAX_VALUE)
            .addGroup(layout.createSequentialGroup()
                .addContainerGap()
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
                    .addGroup(javax.swing.GroupLayout.Alignment.TRAILING, layout.createSequentialGroup()
                        .addGap(0, 0, Short.MAX_VALUE)
                        .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING, false)
                            .addComponent(jLabel4, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                            .addComponent(jLabel3, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)))
                    .addComponent(jLabel2, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addComponent(directorio, javax.swing.GroupLayout.Alignment.TRAILING, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addComponent(jButton1, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE)
                    .addGroup(layout.createSequentialGroup()
                        .addComponent(jLabel5)
                        .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.UNRELATED)
                        .addComponent(jtText_nombre_archivo, javax.swing.GroupLayout.PREFERRED_SIZE, 169, javax.swing.GroupLayout.PREFERRED_SIZE)
                        .addGap(0, 0, Short.MAX_VALUE))
                    .addComponent(jlabelnombrearchivo, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, Short.MAX_VALUE))
                .addContainerGap())
        );
        layout.setVerticalGroup(
            layout.createParallelGroup(javax.swing.GroupLayout.Alignment.LEADING)
            .addGroup(layout.createSequentialGroup()
                .addComponent(jLabel1, javax.swing.GroupLayout.PREFERRED_SIZE, 68, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jButton1)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(directorio)
                .addGap(18, 18, 18)
                .addGroup(layout.createParallelGroup(javax.swing.GroupLayout.Alignment.BASELINE)
                    .addComponent(jtText_nombre_archivo, javax.swing.GroupLayout.PREFERRED_SIZE, javax.swing.GroupLayout.DEFAULT_SIZE, javax.swing.GroupLayout.PREFERRED_SIZE)
                    .addComponent(jLabel5))
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jlabelnombrearchivo)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED, 31, Short.MAX_VALUE)
                .addComponent(jLabel2, javax.swing.GroupLayout.PREFERRED_SIZE, 251, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jLabel3, javax.swing.GroupLayout.PREFERRED_SIZE, 16, javax.swing.GroupLayout.PREFERRED_SIZE)
                .addPreferredGap(javax.swing.LayoutStyle.ComponentPlacement.RELATED)
                .addComponent(jLabel4)
                .addGap(15, 15, 15))
        );

        pack();
    }// </editor-fold>//GEN-END:initComponents

    private void jButton1ActionPerformed(java.awt.event.ActionEvent evt) {//GEN-FIRST:event_jButton1ActionPerformed
   
        try {
              JFileChooser file=new JFileChooser();
              file.setFileSelectionMode(JFileChooser.DIRECTORIES_ONLY);
              file.showOpenDialog(this);
              directorio.setText("Se Descargara En : "+file.getSelectedFile().getAbsolutePath());
              directorio_str= file.getSelectedFile().getAbsolutePath();
        } catch (Exception e) {
               directorio_str="";
        }
    
   
   
    }//GEN-LAST:event_jButton1ActionPerformed

    private void jtText_nombre_archivoKeyReleased(java.awt.event.KeyEvent evt) {//GEN-FIRST:event_jtText_nombre_archivoKeyReleased
        String nombreArchivo="huella.png";
    if(!jtText_nombre_archivo.getText().equalsIgnoreCase("")){
        nombreArchivo="CUS_"+jtText_nombre_archivo.getText()+"_"+nombreArchivo;
    }
    jlabelnombrearchivo.setText("El Nombre que tendra es = "+nombreArchivo);
    }//GEN-LAST:event_jtText_nombre_archivoKeyReleased

    /**
     * @param args the command line arguments
     */
    public static void main(String args[]) {
        /* Set the Nimbus look and feel */
        //<editor-fold defaultstate="collapsed" desc=" Look and feel setting code (optional) ">
        /* If Nimbus (introduced in Java SE 6) is not available, stay with the default look and feel.
         * For details see http://download.oracle.com/javase/tutorial/uiswing/lookandfeel/plaf.html 
         */
        try {
            for (javax.swing.UIManager.LookAndFeelInfo info : javax.swing.UIManager.getInstalledLookAndFeels()) {
                if ("Nimbus".equals(info.getName())) {
                    javax.swing.UIManager.setLookAndFeel(info.getClassName());
                    break;
                }
            }
        } catch (ClassNotFoundException ex) {
            java.util.logging.Logger.getLogger(CapturarHuella.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (InstantiationException ex) {
            java.util.logging.Logger.getLogger(CapturarHuella.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (IllegalAccessException ex) {
            java.util.logging.Logger.getLogger(CapturarHuella.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        } catch (javax.swing.UnsupportedLookAndFeelException ex) {
            java.util.logging.Logger.getLogger(CapturarHuella.class.getName()).log(java.util.logging.Level.SEVERE, null, ex);
        }
        //</editor-fold>

        /* Create and display the dialog */
        java.awt.EventQueue.invokeLater(new Runnable() {
            public void run() {
                
                try {
                    JFrame.setDefaultLookAndFeelDecorated(true);
                    SubstanceLookAndFeel.setSkin("org.jvnet.substance.skin.OfficeBlue2007Skin");

                    //SubstanceLookAndFeel.setCurrentWatermark(Menu.wateMark);
                } catch (Exception e) {
                    System.out.println(e.toString() + " aqi");
                }
                CapturarHuella dialog = new CapturarHuella(new javax.swing.JFrame(), true);
                dialog.addWindowListener(new java.awt.event.WindowAdapter() {
                    @Override
                    public void windowClosing(java.awt.event.WindowEvent e) {
                        System.exit(0);
                    }
                });
                dialog.setVisible(true);
            }
        });
    }

    // Variables declaration - do not modify//GEN-BEGIN:variables
    private javax.swing.JLabel directorio;
    private javax.swing.JButton jButton1;
    private javax.swing.JLabel jLabel1;
    private javax.swing.JLabel jLabel2;
    private javax.swing.JLabel jLabel3;
    private javax.swing.JLabel jLabel4;
    private javax.swing.JLabel jLabel5;
    private javax.swing.JLabel jlabelnombrearchivo;
    private javax.swing.JTextField jtText_nombre_archivo;
    // End of variables declaration//GEN-END:variables
}