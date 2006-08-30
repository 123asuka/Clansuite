< ? p h p 
 / * * 
 *   a d m i n   C o n f i g u r a t i o n 
 * 
 *   P H P   > =   v e r s i o n   5 . 1 . 4 
 * 
 *   L I C E N S E : 
 * 
 *         T h i s   p r o g r a m   i s   f r e e   s o f t w a r e ;   y o u   c a n   r e d i s t r i b u t e   i t   a n d / o r   m o d i f y 
 *         i t   u n d e r   t h e   t e r m s   o f   t h e   G N U   G e n e r a l   P u b l i c   L i c e n s e   a s   p u b l i s h e d   b y 
 *         t h e   F r e e   S o f t w a r e   F o u n d a t i o n ;   e i t h e r   v e r s i o n   2   o f   t h e   L i c e n s e ,   o r 
 *         ( a t   y o u r   o p t i o n )   a n y   l a t e r   v e r s i o n . 
 * 
 *         T h i s   p r o g r a m   i s   d i s t r i b u t e d   i n   t h e   h o p e   t h a t   i t   w i l l   b e   u s e f u l , 
 *         b u t   W I T H O U T   A N Y   W A R R A N T Y ;   w i t h o u t   e v e n   t h e   i m p l i e d   w a r r a n t y   o f 
 *         M E R C H A N T A B I L I T Y   o r   F I T N E S S   F O R   A   P A R T I C U L A R   P U R P O S E .     S e e   t h e 
 *         G N U   G e n e r a l   P u b l i c   L i c e n s e   f o r   m o r e   d e t a i l s . 
 *         Y o u   s h o u l d   h a v e   r e c e i v e d   a   c o p y   o f   t h e   G N U   G e n e r a l   P u b l i c   L i c e n s e 
 *         a l o n g   w i t h   t h i s   p r o g r a m ;   i f   n o t ,   w r i t e   t o   t h e   F r e e   S o f t w a r e 
 *         F o u n d a t i o n ,   I n c . ,   5 1   F r a n k l i n   S t ,   F i f t h   F l o o r ,   B o s t o n ,   M A     0 2 1 1 0 - 1 3 0 1     U S A 
 * 
 *   @ a u t h o r           F l o r i a n   W o l f   < x s i g n . d l l @ c l a n s u i t e . c o m > 
 *   @ a u t h o r           J e n s - A n d r e   K o c h   < v a i n @ c l a n s u i t e . c o m > 
 *   @ c o p y r i g h t     2 0 0 6   C l a n s u i t e   G r o u p 
 *   @ l i n k               h t t p : / / g n a . o r g / p r o j e c t s / c l a n s u i t e 
 * 
 *   @ a u t h o r           J e n s - A n d �   K o c h ,   F l o r i a n   W o l f 
 *   @ c o p y r i g h t     C l a n s u i t e   G r o u p 
 *   @ l i c e n s e         G P L   v 2 
 *   @ v e r s i o n         S V N :   $ I d $ 
 *   @ l i n k               h t t p : / / w w w . c l a n s u i t e . c o m 
 * / 
 
 / * * 
 *   @ d e s c   S e c u r i t y   H a n d l e r 
 * / 
 i f   ( ! d e f i n e d ( ' I N _ C S ' ) ) 
 { 
         d i e ( ' Y o u   a r e   n o t   a l l o w e d   t o   v i e w   t h i s   p a g e   s t a t i c a l l y . '   ) ; 
 } 
 
 
 / / - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
 / /   S u b f i l e s   o f   t h e   m o d u l e 
 / /   - - - - - - - - - - - - - - - - - - - - - - - 
 / /   S u b f i l e s   o f   t h e   m o d u l e   a r e   u s e d   t o   e x t e n d   t h e   m o d u l e s   u s e . 
 / /   F o r   e x a m p l e : 
 / /   Y o u   h a v e   a   m o d u l e ,   t h a t   b e c o m e s   b e y o n d   5 0 0 0   l i n e s   a n d   y o u   w a n t 
 / /   t o   s p l i t   t h a t .   T h e n   y o u   c r e a t e   a   s u b - m o d u l e ,   t h a t   c a n   b e   c a l l e d 
 / /   b y   t h e   f o l l o w i n g   t y p e   o f   U R L : 
 / / 
 / /   h t t p : / / w w w . m y c l a n . c o m / i n d e x . p h p ? m o d = m y m o d u l e & s u b = m y s u b m o d u l e 
 / / 
 / /   O r   i n s i d e   a   t e m p l a t e : 
 / /   { m o d = " m y m o d u l e "   s u b = " m y s u b m o d u l e "   f u n c = " m y f u n c "   p a r a m s = " m y p a r a m s " } 
 / /   
 / /   $ s u b _ f i l e s   =   a r r a y (   ' s u b _ m o d u l e _ n a m e '   = >   a r r a y (   ' f i l e _ n a m e ' ,   ' c l a s s _ n a m e '   )   ) ; 
 / / - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
 $ i n f o [ ' s u b s ' ]   =   a r r a y ( ' c o n f i g s '   = >   a r r a y (   ' c o n f i g s . m o d u l e . p h p ' ,   ' m o d u l e _ a d m i n _ c o n f i g s '   ) , 
 ' m o d u l e s '   = >   a r r a y (   ' m o d u l e s . m o d u l e . p h p ' ,   ' m o d u l e _ a d m i n _ m o d u l e s '   ) , 
 ' u s e r s '   = >   a r r a y (   ' u s e r s . m o d u l e . p h p ' ,   ' m o d u l e _ a d m i n _ u s e r s '   ) , 
 ' u s e r c e n t e r '   = >   a r r a y (   ' u s e r c e n t e r . m o d u l e . p h p ' ,   ' m o d u l e _ a d m i n _ u s e r c e n t e r '   ) , 
 ' g r o u p s '   = >   a r r a y (   ' g r o u p s . m o d u l e . p h p ' ,   ' m o d u l e _ a d m i n _ g r o u p s '   ) , 
 ' p e r m i s s i o n s '   = >   a r r a y (   ' p e r m s . m o d u l e . p h p ' ,   ' m o d u l e _ a d m i n _ p e r m i s s i o n s '   ) , 
 ' m e n u e d i t o r '   = >   a r r a y (   ' m e n u e d i t o r . m o d u l e . p h p ' ,   ' m o d u l e _ a d m i n _ m e n u e d i t o r '   ) , 
 ' s t a t i c '   = >   a r r a y (   ' s t a t i c . m o d u l e . p h p ' ,   ' m o d u l e _ a d m i n _ s t a t i c '   ) , 
   ) ; 
 
 
 
 
 / / - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 
 / /   I n f o s 
 / /   - - - - - 
 / /   T h e s e   i n f o s   a r e   B A C K U P   I n f o s !   T h e y   d o   n o t   a l t e r   t h e   s h o w n 
 / /   i n f o s   i n   a n y   w a y .   J u s t   i n   c a s e   s o m e b o d y   i n s t a l l e d   a   m o d u l e   b y 
 / /   c o p y   a n d   p a s t e   i n t o   t h e   m o d u l e   f o l d e r ,   t h e y   a r e   u s e d   a s   a 
 / /   r e f e r e n c e . 
 / /   I f   y o u   w a n t   t o   c h a n g e   t h e   r e a l   v a l u e s ,   s o   l o o k u p   t h e 
 / /   m o d u l e   i n   t h e   a d m i n   i n t e r f a c e . 
 / / - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -   
 
 $ i n f o [ ' a u t h o r ' ]                   =   ' J e n s - A n d r �   K o c h ,   F l o r i a n   W o l f ' ; 
 $ i n f o [ ' h o m e p a g e ' ]               =   ' h t t p : / / w w w . c l a n s u i t e . c o m ' ; 
 $ i n f o [ ' l i c e n s e ' ]                 =   ' G P L   v 2 ' ; 
 $ i n f o [ ' c o p y r i g h t ' ]             =   ' C l a n s u i t e   G r o u p ' ; 
 $ i n f o [ ' t i m e s t a m p ' ]             =   1 1 5 5 7 1 5 0 3 4 ; 
 $ i n f o [ ' n a m e ' ]                       =   ' a d m i n ' ; 
 $ i n f o [ ' t i t l e ' ]                     =   ' A d m i n   I n t e r f a c e ' ; 
 $ i n f o [ ' d e s c r i p t i o n ' ]         =   ' T h i s   i s   t h e   A d m i n   C o n t r o l   P a n e l ' ; 
 $ i n f o [ ' c l a s s _ n a m e ' ]           =   ' m o d u l e _ a d m i n ' ; 
 $ i n f o [ ' f i l e _ n a m e ' ]             =   ' a d m i n . m o d u l e . p h p ' ; 
 $ i n f o [ ' f o l d e r _ n a m e ' ]         =   ' a d m i n ' ; 
 $ i n f o [ ' i m a g e _ n a m e ' ]           =   ' m o d u l e _ a d m i n . j p g ' ; 
 $ i n f o [ ' v e r s i o n ' ]                 =   ( f l o a t )   0 . 1 ; 
 $ i n f o [ ' c s _ v e r s i o n ' ]           =   ( f l o a t )   0 . 1 ; 
 $ i n f o [ ' c o r e ' ]                       =   1 ; 
 
 / * * 
 *   @ d e s c   A d m i n   M e n u s 
 * / 
   
 $ i n f o [ ' a d m i n _ m e n u ' ]   =   ' a : 0 : { } ' ; 
 
 ? > 
 